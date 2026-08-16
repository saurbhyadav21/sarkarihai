{{-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Qualification Checker</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px 15px;
        }

        .checker {
            max-width: 750px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            background: #fff;
        }

        select:disabled {
            background: #f1f1f1;
        }

        .loading {
            display: none;
            margin-top: 6px;
            color: #777;
            font-size: 13px;
        }

        .result {
            display: none;
            margin-top: 25px;
            padding: 22px;
            background: #f1f8ff;
            border-radius: 8px;
            border-left: 4px solid #0d6efd;
        }

        .result h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .post-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .qualification {
            font-size: 16px;
            line-height: 1.7;
        }

        .not-found {
            color: #777;
        }

    </style>

</head>


<body>


<div class="checker">

    <h1>Qualification Checker</h1>


    <!-- CATEGORY -->

    <div class="field">

        <label for="category">
            Select Category
        </label>

        <select id="category">

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option value="{{ $category }}">
                    {{ $category }}
                </option>

            @endforeach

        </select>

        <div class="loading"
             id="categoryLoading">

            Loading organizations...

        </div>

    </div>


    <!-- ORGANIZATION -->

    <div class="field">

        <label for="organization">
            Select Organization
        </label>

        <select id="organization"
                disabled>

            <option value="">
                Select Organization
            </option>

        </select>

        <div class="loading"
             id="organizationLoading">

            Loading posts...

        </div>

    </div>


    <!-- POST -->

    <div class="field">

        <label for="post">
            Select Post
        </label>

        <select id="post"
                disabled>

            <option value="">
                Select Post
            </option>

        </select>

    </div>


    <!-- RESULT -->

    <div class="result"
         id="qualificationResult">

        <h2>Educational Qualification</h2>

        <div class="post-name">

            <span id="resultPost"></span>

        </div>

        <div class="qualification"
             id="resultQualification"></div>

    </div>


</div>


<script>

const category =
    document.getElementById('category');

const organization =
    document.getElementById('organization');

const post =
    document.getElementById('post');

const categoryLoading =
    document.getElementById('categoryLoading');

const organizationLoading =
    document.getElementById('organizationLoading');

const qualificationResult =
    document.getElementById('qualificationResult');

const resultPost =
    document.getElementById('resultPost');

const resultQualification =
    document.getElementById('resultQualification');


/*
|--------------------------------------------------------------------------
| Category Change
|--------------------------------------------------------------------------
*/

category.addEventListener('change', function () {

    const categoryValue = this.value;


    organization.innerHTML =
        '<option value="">Select Organization</option>';

    post.innerHTML =
        '<option value="">Select Post</option>';


    organization.disabled = true;
    post.disabled = true;


    qualificationResult.style.display =
        'none';


    if (!categoryValue) {
        return;
    }


    categoryLoading.style.display =
        'block';


    fetch(
        "{{ route('qualification.checker.organizations') }}" +
        "?category=" +
        encodeURIComponent(categoryValue)
    )

    .then(response => response.json())

    .then(data => {

        categoryLoading.style.display =
            'none';


        organization.innerHTML =
            '<option value="">Select Organization</option>';


        data.forEach(item => {

            const option =
                document.createElement('option');


            option.value =
                item.organization;


            option.textContent =
                item.organization_full_form
                    ? item.organization +
                      ' (' +
                      item.organization_full_form +
                      ')'
                    : item.organization;


            organization.appendChild(option);

        });


        organization.disabled = false;

    })

    .catch(error => {

        categoryLoading.style.display =
            'none';

        console.error(error);

        alert(
            'Unable to load organizations.'
        );

    });

});


/*
|--------------------------------------------------------------------------
| Organization Change
|--------------------------------------------------------------------------
*/

organization.addEventListener('change', function () {

    const categoryValue =
        category.value;

    const organizationValue =
        this.value;


    post.innerHTML =
        '<option value="">Select Post</option>';

    post.disabled = true;


    qualificationResult.style.display =
        'none';


    if (!organizationValue) {
        return;
    }


    organizationLoading.style.display =
        'block';


    fetch(
        "{{ route('qualification.checker.posts') }}" +
        "?category=" +
        encodeURIComponent(categoryValue) +
        "&organization=" +
        encodeURIComponent(organizationValue)
    )

    .then(response => response.json())

    .then(data => {

        organizationLoading.style.display =
            'none';


        post.innerHTML =
            '<option value="">Select Post</option>';


        data.forEach(item => {

            const option =
                document.createElement('option');


            option.value =
                item.post_name;


            option.textContent =
                item.post_name;


            option.dataset.eligibility =
                item.post_eligibility || '';


            post.appendChild(option);

        });


        post.disabled = false;

    })

    .catch(error => {

        organizationLoading.style.display =
            'none';

        console.error(error);

        alert(
            'Unable to load posts.'
        );

    });

});


/*
|--------------------------------------------------------------------------
| Post Change
|--------------------------------------------------------------------------
*/

post.addEventListener('change', function () {

    const selectedOption =
        this.options[this.selectedIndex];


    if (!this.value) {

        qualificationResult.style.display =
            'none';

        return;

    }


    const eligibility =
        selectedOption.dataset.eligibility;


    resultPost.textContent =
        this.value;


    resultQualification.innerHTML =
        eligibility
            ? eligibility
            : '<span class="not-found">Qualification information not available.</span>';


    qualificationResult.style.display =
        'block';

});

</script>


</body>

</html> --}}


@extends('layouts.front')
<style>

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px 15px;
        }

        .checker {
            max-width: 750px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            background: #fff;
        }

        select:disabled {
            background: #f1f1f1;
        }

        .loading {
            display: none;
            margin-top: 6px;
            color: #777;
            font-size: 13px;
        }

        .result {
            display: none;
            margin-top: 25px;
            padding: 22px;
            background: #f1f8ff;
            border-radius: 8px;
            border-left: 4px solid #0d6efd;
        }

        .result h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .post-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .qualification {
            font-size: 16px;
            line-height: 1.7;
        }

        .not-found {
            color: #777;
        }

    </style>
@section('content')
<div class="checker">

    <h1>Qualification Checker</h1>


    <!-- CATEGORY -->

    <div class="field">

        <label for="category">
            Select Category
        </label>

        <select id="category">

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option value="{{ $category }}">
                    {{ $category }}
                </option>

            @endforeach

        </select>

        <div class="loading"
             id="categoryLoading">

            Loading organizations...

        </div>

    </div>


    <!-- ORGANIZATION -->

    <div class="field">

        <label for="organization">
            Select Organization
        </label>

        <select id="organization"
                disabled>

            <option value="">
                Select Organization
            </option>

        </select>

        <div class="loading"
             id="organizationLoading">

            Loading posts...

        </div>

    </div>


    <!-- POST -->

    <div class="field">

        <label for="post">
            Select Post
        </label>

        <select id="post"
                disabled>

            <option value="">
                Select Post
            </option>

        </select>

    </div>


    <!-- RESULT -->

    <div class="result"
         id="qualificationResult">

        <h2>Educational Qualification</h2>

        <div class="post-name">

            <span id="resultPost"></span>

        </div>

        <div class="qualification"
             id="resultQualification"></div>

    </div>


</div>


<script>

const category =
    document.getElementById('category');

const organization =
    document.getElementById('organization');

const post =
    document.getElementById('post');

const categoryLoading =
    document.getElementById('categoryLoading');

const organizationLoading =
    document.getElementById('organizationLoading');

const qualificationResult =
    document.getElementById('qualificationResult');

const resultPost =
    document.getElementById('resultPost');

const resultQualification =
    document.getElementById('resultQualification');


/*
|--------------------------------------------------------------------------
| Category Change
|--------------------------------------------------------------------------
*/

category.addEventListener('change', function () {

    const categoryValue = this.value;


    organization.innerHTML =
        '<option value="">Select Organization</option>';

    post.innerHTML =
        '<option value="">Select Post</option>';


    organization.disabled = true;
    post.disabled = true;


    qualificationResult.style.display =
        'none';


    if (!categoryValue) {
        return;
    }


    categoryLoading.style.display =
        'block';


    fetch(
        "{{ route('qualification.checker.organizations') }}" +
        "?category=" +
        encodeURIComponent(categoryValue)
    )

    .then(response => response.json())

    .then(data => {

        categoryLoading.style.display =
            'none';


        organization.innerHTML =
            '<option value="">Select Organization</option>';


        data.forEach(item => {

            const option =
                document.createElement('option');


            option.value =
                item.organization;


            option.textContent =
                item.organization_full_form
                    ? item.organization +
                      ' (' +
                      item.organization_full_form +
                      ')'
                    : item.organization;


            organization.appendChild(option);

        });


        organization.disabled = false;

    })

    .catch(error => {

        categoryLoading.style.display =
            'none';

        console.error(error);

        alert(
            'Unable to load organizations.'
        );

    });

});


/*
|--------------------------------------------------------------------------
| Organization Change
|--------------------------------------------------------------------------
*/

organization.addEventListener('change', function () {

    const categoryValue =
        category.value;

    const organizationValue =
        this.value;


    post.innerHTML =
        '<option value="">Select Post</option>';

    post.disabled = true;


    qualificationResult.style.display =
        'none';


    if (!organizationValue) {
        return;
    }


    organizationLoading.style.display =
        'block';


    fetch(
        "{{ route('qualification.checker.posts') }}" +
        "?category=" +
        encodeURIComponent(categoryValue) +
        "&organization=" +
        encodeURIComponent(organizationValue)
    )

    .then(response => response.json())

    .then(data => {

        organizationLoading.style.display =
            'none';


        post.innerHTML =
            '<option value="">Select Post</option>';


        data.forEach(item => {

            const option =
                document.createElement('option');


            option.value =
                item.post_name;


            option.textContent =
                item.post_name;


            option.dataset.eligibility =
                item.post_eligibility || '';


            post.appendChild(option);

        });


        post.disabled = false;

    })

    .catch(error => {

        organizationLoading.style.display =
            'none';

        console.error(error);

        alert(
            'Unable to load posts.'
        );

    });

});


/*
|--------------------------------------------------------------------------
| Post Change
|--------------------------------------------------------------------------
*/

post.addEventListener('change', function () {

    const selectedOption =
        this.options[this.selectedIndex];


    if (!this.value) {

        qualificationResult.style.display =
            'none';

        return;

    }


    const eligibility =
        selectedOption.dataset.eligibility;


    resultPost.textContent =
        this.value;


    resultQualification.innerHTML =
        eligibility
            ? eligibility
            : '<span class="not-found">Qualification information not available.</span>';


    qualificationResult.style.display =
        'block';

});

</script>
@endsection