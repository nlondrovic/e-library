$(function () {
    var hamburger = $('#hamburger');
    var sidebar = $('.sidebar');

    hamburger.on('click', function () {
        if (sidebar.hasClass('sidebar-active')) { // if menu is opened
            //close menu by removing active class
            sidebar.removeClass('sidebar-active');
            //make hamburger shape change
            hamburger.removeClass('fa-times');
            hamburger.addClass('fa-bars-staggered');
            //hide text and arrow
            $(".sidebar-item").addClass("hidden");
            $(".sidebar-item").removeClass("inline");
            //hide/close all opened submenues
            $('.aside-item').hide();
            //change all arrows which are up to down
            $('.arrow').removeClass('fa-angle-up');
            $('.arrow').addClass('fa-angle-down');
        } else {
            //open menu
            sidebar.addClass('sidebar-active');
            //make hamburger shape change
            hamburger.addClass('fa-times');
            hamburger.removeClass('fa-bars-staggered');
            //show text and arrow
            $(".sidebar-item").removeClass("hidden");
            $(".sidebar-item").addClass("inline");
        }
    });
});

$(function () {
    $('.form-checkbox').click(function () {
        if ($('.form-checkbox:checked').length > 0) {
            $('.disabled-btn').removeAttr('disabled');
        } else {
            $('.disabled-btn').attr('disabled', 'disabled');
        }
    });
});

// Arhivirane rezervacije - dropdown
$(".dotsArhiviraneRezervacije").click(function () {
    var dotsArhiviraneRezervacije = $(this);
    var dropdownArhiviraneRezervacije = dotsArhiviraneRezervacije.closest("td").find(".arhivirane-rezervacije");
    dropdownArhiviraneRezervacije.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownArhiviraneRezervacije = $(".arhivirane-rezervacije");
    if (!dropdownArhiviraneRezervacije.is(e.target) &&
        dropdownArhiviraneRezervacije.has(e.target).length === 0) {
        dropdownArhiviraneRezervacije.slideUp();
    }
});

// Autori - dropdown
$(".dotsAutori").click(function () {
    var dotsAutori = $(this);
    var dropdownAutori = dotsAutori.closest("td").find(".dropdown-autori");
    dropdownAutori.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownAutori = $(".dropdown-autori");
    if (!dropdownAutori.is(e.target) &&
        dropdownAutori.has(e.target).length === 0) {
        dropdownAutori.slideUp();
    }
});

// Autori - profile - dropdown
$(".dotsAutor").click(function () {
    $(".dropdown-autor").toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownAutor = $(".dropdown-autor");
    if (!dropdownAutor.is(e.target) &&
        dropdownAutor.has(e.target).length === 0 &&
        !$(e.target).is('.dotsAutor')) {
        dropdownAutor.slideUp();
    }
});

// Knjige - dropdown
$(".dotsKnjige").click(function () {
    var dotsKnjige = $(this);
    var dropdownKnjige = dotsKnjige.closest("td").find(".dropdown-knjige");
    dropdownKnjige.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownKnjige = $(".dropdown-knjige");
    if (!dropdownKnjige.is(e.target) &&
        dropdownKnjige.has(e.target).length === 0) {
        dropdownKnjige.slideUp();
    }
});

// Knjiga - osnovni detalji - dropdown
$(".dotsKnjigaOsnovniDetalji").click(function () {
    $(".dropdown-knjiga-osnovni-detalji").toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownKnjigaOsnovniDetalji = $(".dropdown-knjiga-osnovni-detalji");
    if (!dropdownKnjigaOsnovniDetalji.is(e.target) &&
        dropdownKnjigaOsnovniDetalji.has(e.target).length === 0 &&
        !$(e.target).is('.dotsKnjigaOsnovniDetalji')) {
        dropdownKnjigaOsnovniDetalji.slideUp();
    }
});

// Student - table - dropdown
$(".dotsStudent").click(function () {
    var dotsStudent = $(this);
    var dropdownStudent = dotsStudent.closest("td").find(".dropdown-student");
    dropdownStudent.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownStudent = $(".dropdown-student");
    if (!dropdownStudent.is(e.target) &&
        dropdownStudent.has(e.target).length === 0) {
        dropdownStudent.slideUp();
    }
});

// Header - dropdown for create button
$('#dropdownCreate').click(function () {
    $('.dropdown-create').toggle();
});

$(document).on('mouseup', function (e) {
    var dropdownCreate = $(".dropdown-create");
    if (!dropdownCreate.is(e.target) &&
        dropdownCreate.has(e.target).length === 0 &&
        !$(e.target).is('.dropdownCreate')) {
        dropdownCreate.slideUp();
    }
});

// Header - dropdown for profile button
$('#dropdownProfile').click(function () {
    $('.dropdown-profile').toggle();
});

$(document).on('mouseup', function (e) {
    var dropdownProfile = $(".dropdown-profile");
    if (!dropdownProfile.is(e.target) &&
        dropdownProfile.has(e.target).length === 0 &&
        !$(e.target).is('.dropdownProfile')) {
        dropdownProfile.slideUp();
    }
});

// Category - table - dropdown
$(".dotsCategory").click(function () {
    var dotsCategory = $(this);
    var dropdownCategory = dotsCategory.closest("td").find(".dropdown-category");
    dropdownCategory.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownCategory = $(".dropdown-category");
    if (!dropdownCategory.is(e.target) &&
        dropdownCategory.has(e.target).length === 0) {
        dropdownCategory.slideUp();
    }
});

// Genre - table - dropdown
$(".dotsGenre").click(function () {
    var dotsGenre = $(this);
    var dropdownGenre = dotsGenre.closest("td").find(".dropdown-genre");
    dropdownGenre.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownGenre = $(".dropdown-genre");
    if (!dropdownGenre.is(e.target) &&
        dropdownGenre.has(e.target).length === 0) {
        dropdownGenre.slideUp();
    }
});

// Publisher - table - dropdown
$(".dotsPublisher").click(function () {
    var dotsPublisher = $(this);
    var dropdownPublisher = dotsPublisher.closest("td").find(".dropdown-publisher");
    dropdownPublisher.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownPublisher = $(".dropdown-publisher");
    if (!dropdownPublisher.is(e.target) &&
        dropdownPublisher.has(e.target).length === 0) {
        dropdownPublisher.slideUp();
    }
});

// Book bind - table - dropdown
$(".dotsBookBind").click(function () {
    var dotsBookBind = $(this);
    var dropdownBookBind = dotsBookBind.closest("td").find(".dropdown-book-bind");
    dropdownBookBind.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownBookBind = $(".dropdown-book-bind");
    if (!dropdownBookBind.is(e.target) &&
        dropdownBookBind.has(e.target).length === 0) {
        dropdownBookBind.slideUp();
    }
});

// Format - table - dropdown
$(".dotsFormat").click(function () {
    var dotsFormat = $(this);
    var dropdownFormat = dotsFormat.closest("td").find(".dropdown-format");
    dropdownFormat.toggle();
})

$(document).on('mouseup', function (e) {
    var dropdownFormat = $(".dropdown-format");
    if (!dropdownFormat.is(e.target) &&
        dropdownFormat.has(e.target).length === 0) {
        dropdownFormat.slideUp();
    }
});

// Student image upload
var loadFileStudent = function (event) {
    var imageStudent = document.getElementById('image-output-student');

    imageStudent.style.display = "block";

    if (event.target.files[0]) {
        imageStudent.src = URL.createObjectURL(event.target.files[0]);
    }
    else {
        imageStudent.src = '/assets/img/user.jpg';
    }
};


// Book image upload
var loadFileBook = function (event) {
    var imageStudent = document.getElementById('image-output-book');

    imageStudent.style.display = "block";

    if (event.target.files[0]) {
        imageStudent.src = URL.createObjectURL(event.target.files[0]);
    }
    else {
        imageStudent.src = '/assets/img/book.jpg';
    }
};
