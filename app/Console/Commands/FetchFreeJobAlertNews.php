<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobFeed;
use App\Helpers\FreeJobAlertHelper;

class FetchFreeJobAlertNews extends Command
{
    protected $signature =
    'jobs:fetch-news';

    protected $description =
    'Fetch FreeJobAlert Google News Sitemap';

    public function handle()
    {
        $xml =
            simplexml_load_file(
                'https://www.freejobalert.com/google-news-sitemap.xml'
            );

        if (!$xml) {

            $this->error(
                'XML load failed'
            );

            return;
        }

        foreach ($xml->url as $item) {

            $url =
                (string)$item->loc;

            $news =
                $item->children(
                    'news',
                    true
                );

            $title =
                trim(
                    (string)$news
                        ->news
                        ->title
                );

            $published =
                (string)$news
                    ->news
                    ->publication_date;

            preg_match(
                '/-([0-9]+)$/',
                $url,
                $match
            );

            $articleId =
                $match[1]
                ?? null;

            if (!$articleId)
                continue;
dd($title);
            JobFeed::updateOrCreate(
                [
                    'article_id' => $articleId
                ],
                [
                    'source' => 'FreeJobAlert',

                    'url' => $url,

                    'title' => $title,

                    'url_type' => FreeJobAlertHelper::detect($title),

                    'published_at' => date(
                        'Y-m-d H:i:s',
                        strtotime($published)
                    )
                ]
            );

            $this->info(
                $articleId
                    . ' inserted'
            );
        }

        $this->info(
            'Done'
        );
    }
}
