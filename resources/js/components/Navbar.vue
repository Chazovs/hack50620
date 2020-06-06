<template>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="../assets/images/brand.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
                <input class="form-control mr-sm-2 search-main" type="search" placeholder="Введите ключевой запрос"
                       aria-label="Search">
            </form>
            <div class="nav-blocks">
                <AddDocument></AddDocument>
                <AddDocumentSecond></AddDocumentSecond>
                <div class="messages"><svg class="bi bi-envelope" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                    <path d="M.05 3.555C.017 3.698 0 3.847 0 4v.697l5.803 3.546L0 11.801V12c0 .306.069.596.192.856l6.57-4.027L8 9.586l1.239-.757 6.57 4.027c.122-.26.191-.55.191-.856v-.2l-5.803-3.557L16 4.697V4c0-.153-.017-.302-.05-.445L8 8.414.05 3.555z"/>
                </svg></div>
                <div class="notifications"><svg class="bi bi-bell" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg></div>
                <div class="user-block">
                    Reactive RND <img class="user-pic" src="../assets/images/Rectangle.png" alt="">
                    <div><svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg></div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    import AddDocument from "./AddDocument";
    import AddDocumentSecond from "./AddDocumentSecond";
    export default {
        name: 'Navbar',
        components: {
            AddDocument,
            AddDocumentSecond
        }
    }
</script>

<style scoped>
    nav {
        background: linear-gradient(92.77deg, #0D0AAB 0.28%, #65B6F7 55.41%, #FF22A3 117.35%), linear-gradient(90deg, #9EA7FC 0%, #65B6F7 124.87%);
        color: white;
        padding: 0;
        font-family: Roboto;
        line-height: 30px;
    }

    nav a {
        color: white !important;
    }

    .navbar-brand {
        background-color: rgba(50, 50, 93, 0.2);
        height: 60px;
        padding: 15px;
        display: flex;
    }

    .nav-blocks {
        display: flex;
        height: 60px;
    }
    .nav-blocks>div {
        display: flex;
        align-items: center;
        border-left: 1px solid white;
        padding: 10px;
    }

    .form-control.search-main, .form-control.search-main:focus {
        background-color: transparent;
        color: white;
        border: none;
        box-shadow: none;
        width: 300px;
    }

    .form-control .search-main input::placeholder {
        color: white !important;
    }

    .user-pic {
        border-radius: 50%;
        margin: 15px;
    }

    #navbarSupportedContent {
        justify-content: space-between;
    }
    .messages svg, .notifications svg {
        font-size: 25px;
    }
</style>
