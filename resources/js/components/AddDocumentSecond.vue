<template>
    <div>
        <button type="button" class="btn btn-primary add-document-button" data-toggle="modal" data-target="#addDocumentSecond"></button>
        <div class="modal fade" id="addDocumentSecond" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление документа</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group">
                                <input class="form-control-file" type="file" id="file-second" ref="file"
                                       v-on:change="handleFileUpload()"/>
                            </div>
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
</template>

<script>
    import EventBus from '../event-bus';
    import $ from 'jquery';
    export default {
        name: "AddDocument",
        methods: {
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },
            submitFile() {
                let that = this;
                let formData = new FormData();
                formData.append('file', this.file);
                axios.post('/api/new/file/with/ai',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (response) {
                    if (response.data.status === 'success') {
                        Vue.$toast.open({
                            message: 'Файл успешно загружен',
                            type: "success",
                            duration: 5000,
                            dismissible: true,
                            position: "top-right"
                        });
                        $('#addDocumentSecond').modal('hide');
                        EventBus.$emit('loaded', response.data.resultParsing);
                    } else {
                        Vue.$toast.open({
                            message: 'В данный момент система не может обработать файл с этой кодировкой.Попробуй другой файл',
                            type: "error",
                            duration: 5000,
                            dismissible: true,
                            position: "top-right"
                        })
                        that.result = false;
                    }
                })
                    .catch(function () {
                        that.result = false;
                        Vue.$toast.open({
                            message: 'В данный момент система не может обработать файл с этой кодировкой.Попробуй другой файл',
                            type: "error",
                            duration: 5000,
                            dismissible: true,
                            position: "top-right"
                        })
                    });
            }
        },
        data() {
            return {
                file: '',
                result: false
            }
        }
    }
</script>

<style scoped>
    .modal-dialog {
        color: black;
    }
    .result-block {
        max-width: 100%;
    }
    .add-document-button {
        background-color: transparent;
        border-radius: 50%;
        border: 1px dashed white;
        width: 25px;
        height: 25px;
    }
    .add-document-button::before {
        content: "!";
        position: relative;
        top: -6px;
        right: 2px;
    }
</style>
