<template>
    <div>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed accordion-title" type="button"
                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                            Справочная информация
                            <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                     data-parent="#accordionExample">
                    <div class="card-body">
                        <h6>О компании</h6>
                        <ul>
                            <li>
                                Цели и замыслы компании
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </li>
                            <li>
                                Миссии компании
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            </li>
                            <li>
                                История компании
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            </li>
                            <li>
                                Оргсистема
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                            </li>
                            <li>
                                Тест
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                            </li>
                        </ul>
                        <h6>Правила</h6>
                        <ul>
                            <li>
                                Основные положения
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </li>
                            <li>
                                Отпуск
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            </li>
                            <li>
                                Как подать заявление
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            </li>
                            <li>
                                Распорядок дня
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                            </li>
                            <li>
                                Тест
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                            </li>
                        </ul>
                        <h6>Требования</h6>
                        <ul>
                            <li>
                                Образование
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </li>
                            <li>
                                Контроль знаний
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            </li>
                            <li>
                                Тест
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left accordion-title" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                            Документация
                            <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <h6>О компании</h6>
                        <ul>
                            <li>
                                Цели и замыслы компании
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </li>
                            <li>
                                Миссии компании
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            </li>
                            <li>
                                История компании
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            </li>
                            <li>
                                Оргсистема
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                            </li>
                            <li>
                                Тест
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mentor">
            <div>Ваш наставник: </div>
            <div>Анна Николаевна</div>
            <div>руководитель отдела экологии</div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Sidebar"
    }
</script>

<style scoped>
    .accordion {
        border: none;
        border-right: 1px solid #D1D1D6;
    }

    .accordion .card {
        border: none;
    }

    .accordion .card-header {
        background-color: white;
        border: none;
    }

    .accordion .card-body {
        padding: 0.5rem 2.25rem;
    }

    .accordion-title {
        text-transform: uppercase;
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 15px;
        display: flex;
        align-items: flex-end;
        text-align: center;
        color: #707090;
        justify-content: space-between;
    }

    .accordion-title:focus {
        box-shadow: none;
        text-decoration: none;
    }

    .accordion-title svg {
        color: #FF2D55;
        font-size: 16px;
    }

    button:not(.collapsed)::before {
        display: block;
        width: 30px;
        height: 30px;
        background-color: #FF2D55;;
    }

    .accordion li {
        display: flex;
        justify-content: space-between;
        list-style-type: none;
    }

    .accordio li:before {
        content: '-';
    }

    .mentor {
        color: white;
        width: 100%;
        height: 107px;
        background: #273EC3;
        display: flex;
        flex-direction: column;
        box-shadow: 0 11px 14px rgba(27, 30, 41, 0.08), 0 4px 4px rgba(34, 38, 45, 0.21);
        justify-content: center;
        padding: 20px;
    }
</style>
