<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SitemapController;

Route::get('/', [JobController::class, 'home'])->name('home');

Route::get('/contact', [JobController::class, 'contact'])->name('contact'); // Landing page
Route::get('/privacy-policy', [JobController::class, 'privacy'])->name('privacy'); // Landing page
Route::get('/disclaimer', [JobController::class, 'disclaimer'])->name('disclaimer'); // Landing page
Route::get('/fact-checking-policy', [JobController::class, 'policy'])->name('policy'); // Landing page
Route::get('/dmca', [JobController::class, 'dmca'])->name('dmca'); // Landing page


Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// Route::get('/sarkari-naukri', [JobController::class, 'index'])->name('jobs.index'); // List all jobs
// Route::get('/sarkari-naukri/{slug}', [JobController::class, 'show'])->name('job.show'); // Show single job

Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
Route::get('/result/{id}/edit', [JobController::class, 'resultEdit'])->name('result.edit');
Route::get('/admitcard/{id}/edit', [JobController::class, 'admitEdit'])->name('admit.edit');


Route::post('/job/{id}/update', [JobController::class, 'update'])->name('job.update');
Route::get('/job/edit-list/{limit?}', [JobController::class, 'editList'])
    ->name('job.edit.list');
Route::get('/job/org-edit-list/{limit?}', [JobController::class, 'OrgEditList'])
    ->name('job.org.edit.list');

Route::get('/result/edit-list', [JobController::class, 'resultList'])->name('job.result.list');
Route::get('/admit-card/edit-list', [JobController::class, 'admitList'])->name('job.admit.list');

Route::get('/add-job', [JobController::class, 'addJob'])->name('job.addjob');
Route::delete('/job/{id}', [JobController::class, 'destroy'])->name('job.destroy');

Route::delete('/result/{id}', [JobController::class, 'resultDestroy'])->name('result.destroy');

// Route::get('/add-job', function () {
//     return view('jobs/add-job');
// });

Route::post('/add-job', [JobController::class, 'storeJson'])->name('job.store.json');



// Route::get('/state/{state}/jobs', [JobController::class, 'stateJobs'])->name('state.jobs');
Route::get('/jobs/{state}/{category}', [JobController::class, 'stateCategoryJobs'])
    ->name('state.category.jobs');

Route::post(
    '/category/ajax/delete',
    [JobController::class, 'deleteCategory']
)->name('category.ajax.delete');

//admit card edit
// 1️⃣ Admit card edit page (admin ya form)
Route::get('/job/{id}/admit', [JobController::class, 'admitEdit'])->name('job.admitEdit');

// 2️⃣ Admit card store / save
Route::post('/add-admit', [JobController::class, 'admitStoreJson'])->name('job.admitStoreJson');

// 3️⃣ Frontend view: Admit card show by slug (SEO-friendly)
Route::get('/admit/{slug}', [JobController::class, 'admitShow'])->name('admit.show');

Route::get('/admit-cards', [JobController::class, 'admitIndex'])->name('admitIndex');



//Result out
// 1️⃣ Admit card edit page (admin ya form)
Route::get('/job/{id}/result', [JobController::class, 'resultEdit'])->name('job.resultEdit');

// 2️⃣ result card store / save
Route::post('/add-result', [JobController::class, 'resultStoreJson'])->name('job.resultStoreJson');

// 3️⃣ Frontend view: result card show by slug (SEO-friendly)
Route::get('/result/{slug}', [JobController::class, 'resultShow'])->name('result.show');

Route::get('/result-cards', [JobController::class, 'resultIndex'])->name('resultIndex');

Route::post('/category/ajax/store', [JobController::class, 'storeCategory'])
    ->name('category.ajax.store');


//NewRoute For New Templtes
// All Sarkari Naukri
Route::get(
    '/sarkari-naukri',
    [JobController::class, 'latestJobs']
)->name('sarkari.naukri');

Route::get(
    '/sarkari-naukri/{state}',
    [JobController::class, 'latestJobs']
)->name('sarkari.naukri.state');

Route::get(
    '/sarkari-naukri/{state}/{category}',
    [JobController::class, 'latestJobs']
)->name('sarkari.naukri.category');

Route::get(
    '/sarkari-naukri/{state}/{category}/{slug}',
    [JobController::class, 'jobDetail']
)->name('sarkari.naukri.detail');

Route::post(
    '/job/{id}/category',
    [JobController::class, 'updateCategory']
)
    ->name('job.updateCategory');

Route::post(
    '/job/{id}/sub-category',
    [JobController::class, 'updateSubCategory']
)
    ->name('job.updateSubCategory');

Route::post(
    '/job/{id}/topic',
    [JobController::class, 'updateTopic']
)
    ->name('job.updateTopic');

Route::post(
    '/job/{id}/state',
    [JobController::class, 'updateState']
)
    ->name('job.updateState');

Route::post(
    '/job/{id}/organization',
    [JobController::class, 'updateOrganization']
)
    ->name('job.updateOrganization');

Route::post(
    '/job/{id}/organization-full-form',
    [JobController::class, 'updateOrganizationFullForm']
)
    ->name('job.updateOrganizationFullForm');   


Route::get(
    '/import/wp/{page}',
    [JobController::class, 'importWpPosts']
);
Route::get(
    '/import/wpx/all',
    [JobController::class, 'importAllWpPosts']
);

Route::get(
    '/test/sarkariresult',
    [JobController::class, 'testSarkariResult']
);

Route::get(
    '/search-jobs',
    [JobController::class, 'searchJobs']
)->name('search.jobs');

Route::get('/search', [JobController::class, 'search'])->name('search');

Route::get('/last-date-soon/{type}', [JobController::class, 'lastDateSoon'])
    ->name('last-date-soon');


/*
|--------------------------------------------------------------------------
| Latest Jobs
|--------------------------------------------------------------------------
*/

Route::get('/latest-jobs', [JobController::class, 'latestJobs'])
    ->name('jobs.latest');

Route::get('/latest-jobs/{state}', [JobController::class, 'latestJobs'])
    ->name('jobs.state');

Route::get('/latest-jobs/{state}/{category}', [JobController::class, 'latestJobs'])
    ->name('jobs.state.category');


/* |---- ---------------------------------------------------------------------- | Sarkari Naukri |-------------------------------------------------------------------------- */
// Route::get('/sarkari-naukri', [JobController::class, 'latestJobs'])->name('jobs.index');
// Route::get('/sarkari-naukri/{state}', [JobController::class, 'latestJobs'])->name('jobs.state');
// Route::get('/sarkari-naukri/{state}/{category}', [JobController::class, 'latestJobs'])->name('jobs.category');
// Route::get('/sarkari-naukri/{state}/{category}/{slug}', [JobController::class, 'jobDetails'])->name('jobs.details');


/*
|--------------------------------------------------------------------------
| AJAX (Future Ready)
|--------------------------------------------------------------------------
*/

Route::get('/ajax/jobs', [JobController::class, 'latestJobs'])
    ->name('ajax.jobs');


/*
|--------------------------------------------------------------------------
| Job Details
|--------------------------------------------------------------------------
*/

Route::get('/job/{slug}', [JobController::class, 'jobDetails'])
    ->name('jobs.show');

Route::get('/admin/check-sitemap-errors', [JobController::class, 'checkSitemapErrors']);

Route::post(
    '/check-eligibility',
    [JobController::class, 'checkEligibility']
)->name('check.eligibility');


Route::get(
    '/author/{slug}',
    [JobController::class,'author']
)->name('author');


//organization_full_form &&&&&&  organization_update both sarakri.com or freejob alert.com
Route::get(
    'freeJobAlertData_organization_full_form_organization_update',
    [JobController::class, 'freeJobAlertData']
)->name('freeJobAlertData');
Route::get(
    'sarkarinaukri_organization_full_form_organization_update',
    [JobController::class, 'SarkariNaukriData']
)->name('SarkariNaukriData');



Route::get('/ai-test', function(App\Services\OpenAIService $ai){

    return $ai->getOrganization("Allahabad University");

});