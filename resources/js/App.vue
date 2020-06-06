<template>
    <div>
        <Navbar></Navbar>
        <Progress></Progress>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 sidebar">
                    <Sidebar></Sidebar>
                </div>
                <div class="col-sm-10">
                    <router-view/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Navbar from "./components/Navbar";
    import AddDocument from "./components/AddDocument";
    import AddDocumentSecond from "./components/AddDocumentSecond";
    import Progress from "./components/Progress";
    import Sidebar from "./components/Sidebar";

    export default {
        name: 'App',
        components: {
            Navbar,
            AddDocument,
            AddDocumentSecond,
            Progress,
            Sidebar
        }
    }
</script>

<style lang="scss">
    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
    }

    #nav {
        padding: 30px;

        a {
            font-weight: bold;
            color: #2c3e50;

            &.router-link-exact-active {
                color: #42b983;
            }
        }
    }
    .sidebar {
        padding: 0;
    }
</style>
