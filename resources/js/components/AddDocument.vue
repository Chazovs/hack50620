<template>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDocument">
            +
        </button>
        <div class="modal fade" id="addDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить документ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="large-12 medium-12 small-12 cell">
                                <label>File
                                    <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary" v-on:click="submitFile()">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddDocument",
        methods: {
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },
            submitFile() {
                let formData = new FormData();
                formData.append('file', this.file);
                axios.post('/api/new/file',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function () {
                    console.log('SUCCESS!!');
                })
                 .catch(function () {
                    console.log('FAILURE!!');
                 });
            }
        },
        data() {
            return {
                file: ''
            }
        }
    }
</script>

<style scoped>
    .modal-header {
        color: black;
    }
</style>
