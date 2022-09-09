<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.search-select').select2({
            width: 'resolve',
            height: 'resolve',
            placeholder: "Select...",
            allowClear: true
        });
    });
</script>

<script>
    let searchWrapper2 = document.querySelector(".search-input");
    let inputBox2 = searchWrapper2.querySelector("input");
    let model2;

    $(document).ready(function () {
        let routeName = "{{ \Illuminate\Support\Facades\Route::currentRouteName() }}";
        routeName = routeName.split('.')[0];
        let model = routeName.substring(0, routeName.length - 1);
        model2 = model;

        // if not on page where search bar exists
        if (model !== "author" && model !== "librarian" && model !== "student" && model !== "book" && model !== "admin") {
            return;
        }

        // getting all required elements
        const searchWrapper = document.querySelector(".search-input");
        const inputBox = searchWrapper.querySelector("input");
        const suggBox = searchWrapper.querySelector(".autocom-box");
        const icon = searchWrapper.querySelector(".search-icon");
        let linkTag = searchWrapper.querySelector("a");
        let webLink;

        // if user press any key and release
        inputBox.onkeyup = (e) => {
            let userData = e.target.value; //user enetered data
            let emptyArray = [];
            if (userData) {
                icon.onclick = () => {
                    webLink = `http://localhost:8000/${model}s?search=${userData}`;
                    linkTag.setAttribute("href", webLink);
                    linkTag.click();
                }
                emptyArray = suggestions.filter((data) => {
                    //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                    return data.toLocaleLowerCase().includes(userData.toLocaleLowerCase());
                });
                emptyArray = emptyArray.map((data) => {
                    // passing return data inside li tag
                    return data = `<li>${data}</li>`;
                });
                searchWrapper.classList.add("active"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");
                for (let i = 0; i < allList.length; i++) {
                    //adding onclick attribute in all li tag
                    allList[i].setAttribute("onclick", "select(this)");
                }
            } else {
                searchWrapper.classList.remove("active"); //hide autocomplete box
            }
        }


        function showSuggestions(list) {
            let listData;
            if (!list.length) {
                userValue = inputBox.value;
                listData = `<li>${userValue}</li>`;
            } else {
                listData = list.join('');
            }
            suggBox.innerHTML = listData;
        }

    });

    function select(element) {
        let selectData = element.textContent;
        inputBox2.value = selectData;

        let url = "{{ route('authors.index', ['search' => "searchQuery"]) }}";
        url = url.replace("searchQuery", selectData);
        url = url.replace("author", model2);

        searchWrapper2.classList.remove("active");
        document.location = url;
    }
</script>
<script>
    $(document).ready(function () {
        if ($('.activity-card').length > 6) {
            $('.activity-card:gt(6)').hide();
            $('.activity-showMore').show();
            $(this).text('Show more');
        }

        $('.activity-showMore').on('click', function () {
            $('.activity-card:gt(6)').toggle();
            if ($(this).text() == 'Show less') {
                $(this).text('Show more')
            } else {
                $(this).text('Show less');
            }
        });
    });
</script>
