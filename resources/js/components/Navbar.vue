<template>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">MVP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 search-main" type="search" placeholder="Введите ключевой запрос"
                       aria-label="Search">
            </form>
            <div class="nav-blocks">
                <div class="add-document">add</div>
                <div class="messages">Сообщения</div>
                <div class="notifications">Уведомления</div>
                <div class="user-block">
                    Reactive RND <img class="user-pic" src="../assets/images/Rectangle.png" alt="">
                    <div></div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    import AddDocument from "./AddDocument";
    export default {
        name: 'Navbar',
        components: {
            AddDocument
        }
    }
</script>

<style scoped>
    nav {
        background: linear-gradient(90deg, #9EA7FC 0%, #65B6F7 124.87%);
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
    }

    .nav-blocks {
        display: flex;
    }
    .nav-blocks div {
        margin: 0 10px;
    }

    .form-control.search-main, .form-control.search-main:focus {
        background-color: transparent;
        color: white;
        border: none;
        box-shadow: none;
        width: 300px;
    }

    .form-control.search-main input::placeholder {
        color: white !important;
    }

    .user-pic {
        border-radius: 50%;
    }

    #navbarSupportedContent {
        justify-content: space-between;
    }
</style>
