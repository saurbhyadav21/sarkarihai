<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Government Salary Calculator</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px 15px;
        }

        .salary-calculator {
            max-width: 700px;
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
        }

        select:disabled {
            background: #f1f1f1;
        }

        .salary-result {
            margin-top: 25px;
            padding: 20px;
            background: #f1f8ff;
            border-radius: 8px;
            display: none;
        }

        .salary-result h2 {
            margin-top: 0;
        }

        .salary-value {
            font-size: 28px;
            font-weight: bold;
        }

        .loading {
            display: none;
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="salary-calculator">

    <h1>Government Salary Calculator</h1>

    <div class="field">

        <label for="category">
            Select Category
        </label>

        <select id="category">
            <option value="">Select Category</option>

            @foreach($categories as $category)
                <option value="{{ $category }}">
                    {{ $category }}
                </option>
            @endforeach

        </select>

        <div class="loading" id="categoryLoading">
            Loading organizations...
        </div>

    </div>


    <div class="field">

        <label for="organization">
            Select Organization
        </label>

        <select id="organization" disabled>

            <option value="">
                Select Organization
            </option>

        </select>

        <div class="loading" id="organizationLoading">
            Loading posts...
        </div>

    </div>


    <div class="field">

        <label for="post">
            Select Post
        </label>

        <select id="post" disabled>

            <option value="">
                Select Post
            </option>

        </select>

    </div>


    <div class="salary-result" id="salaryResult">

        <h2>Salary Details</h2>

        <p>
            <strong>Post:</strong>
            <span id="resultPost"></span>
        </p>

        <p>
            <strong>Pay Scale:</strong>
        </p>

        <div class="salary-value" id="resultSalary"></div>

    </div>

</div>


<script>

const category = document.getElementById('category');
const organization = document.getElementById('organization');
const post = document.getElementById('post');

const salaryResult = document.getElementById('salaryResult');
const resultPost = document.getElementById('resultPost');
const resultSalary = document.getElementById('resultSalary');

const categoryLoading =
    document.getElementById('categoryLoading');

const organizationLoading =
    document.getElementById('organizationLoading');


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

    salaryResult.style.display = 'none';

    if (!categoryValue) {
        return;
    }

    categoryLoading.style.display = 'block';

    fetch(
        "{{ route('salary.calculator.organizations') }}" +
        "?category=" +
        encodeURIComponent(categoryValue)
    )
    .then(response => response.json())
    .then(data => {

        categoryLoading.style.display = 'none';

        organization.innerHTML =
            '<option value="">Select Organization</option>';

        data.forEach(item => {

            const option =
                document.createElement('option');

            option.value = item.organization;

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

        categoryLoading.style.display = 'none';

        console.error(error);

        alert('Unable to load organizations.');

    });

});


/*
|--------------------------------------------------------------------------
| Organization Change
|--------------------------------------------------------------------------
*/

organization.addEventListener('change', function () {

    const categoryValue = category.value;
    const organizationValue = this.value;

    post.innerHTML =
        '<option value="">Select Post</option>';

    post.disabled = true;

    salaryResult.style.display = 'none';

    if (!organizationValue) {
        return;
    }

    organizationLoading.style.display = 'block';

    fetch(
        "{{ route('salary.calculator.posts') }}" +
        "?category=" +
        encodeURIComponent(categoryValue) +
        "&organization=" +
        encodeURIComponent(organizationValue)
    )
    .then(response => response.json())
    .then(data => {

        organizationLoading.style.display = 'none';

        post.innerHTML =
            '<option value="">Select Post</option>';

        data.forEach(item => {

            const option =
                document.createElement('option');

            option.value = item.post_name;

            option.textContent = item.post_name;

            option.dataset.salary =
                item.post_salary || '';

            post.appendChild(option);

        });

        post.disabled = false;

    })
    .catch(error => {

        organizationLoading.style.display = 'none';

        console.error(error);

        alert('Unable to load posts.');

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

        salaryResult.style.display = 'none';

        return;
    }

    resultPost.textContent =
        this.value;

    resultSalary.textContent =
        selectedOption.dataset.salary ||
        'Salary information not available';

    salaryResult.style.display = 'block';

});

</script>

</body>
</html>