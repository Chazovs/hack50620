<template>
    <div class="col-sm-12">
        <div v-if="document">
            <h5 v-if="document.role && document.role.length">
                Должность: {{document.role[0].text}}
            </h5>

            <h5 v-if="document.category && document.category.length">
                Должность: {{document.category[0].text}}
            </h5>

            <div v-if="document.mustKnow && document.mustKnow.length">
                <h5>Должен знать:</h5>
                <ul>
                    <li v-for="row in document.mustKnow" v-html="addLinks(row.text)"></li>
                </ul>
            </div>

            <div v-if="document.rights && document.rights.length">
                <h5>Права:</h5>
                <ul>
                    <li v-for="row in document.rights">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.education && document.education.length">
                <h5>Требования к образованию:</h5>
                <ul>
                    <li v-for="row in document.education">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.expirience && document.expirience.length">
                <h5>Опыт работы:</h5>
                <ul>
                    <li v-for="row in document.expirience">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.subordination && document.subordination.length">
                <h5>Кому подчиняется:</h5>
                <ul>
                    <li v-for="row in document.subordination">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.duties && document.duties.length">
                <h5>Должностные обязанности:</h5>
                <ul>
                    <li v-for="row in document.duties">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.responsibility && document.responsibility.length">
                <h5>Несет ответственность за:</h5>
                <ul>
                    <li v-for="row in document.responsibility">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.goal && document.goal.length">
                <h5>Цели должности:</h5>
                <ul>
                    <li v-for="row in document.goal">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.organizations && document.organizations.length">
                <h5>Связанные организации:</h5>
                <ul>
                    <li v-for="row in document.organizations">
                        {{row.text}}
                    </li>
                </ul>
            </div>

            <div v-if="document.doc && document.doc.length">
                <h5>Связанные документы:</h5>
                <ul>
                    <li v-for="row in document.doc">
                        <a href="http://docs.cntd.ru/document/901969825">{{row.text}}</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</template>

<script>
    import EventBus from '../event-bus';

    export default {
        name: 'Home',
        data() {
            return {
                document: false,
                //  в дальшейнем документы будут получаться из базы,
                //  пока что, имитируя ее, добавили несколько документов здесь
                knownDocuments: [
                    {
                        title: 'Законодательство о рекламе',
                        link: 'http://hack.cofro.ru/app/law-on-reclame.pdf'
                    },
                    {
                        title: 'защите прав потребителей',
                        link: 'http://hack.cofro.ru/app/consumer-protection.pdf'
                    },

                ]
            }
        },
        methods: {
            addLinks(text) {
                for (let document of this.knownDocuments) {
                    text = text.replace(document.title, `<a href="${document.link}" target="_blank">${document.title}</a>`);
                }
              return text;
            },
            prepareDocument(document) {
                let preparedDocument = {
                    'mustKnow': [],
                    'rights': [],
                    'role': [],
                    'category': [],
                    'education': [],
                    'expirience': [],
                    'doc': [],
                    'subordination': [],
                    'duties': [],
                    'responsibility': [],
                    'goal': [],
                    'organizations': [],
                };
                for(let row of document) {
                    if (row.label === 'MUST_KNOW') {
                       preparedDocument['mustKnow'].push(row)
                    }
                    if (row.label === 'RIGHTS') {
                        preparedDocument['rights'].push(row)
                    }
                    if (row.label === 'ROLE') {
                        preparedDocument['role'].push(row)
                    }
                    if (row.label === 'CATEGORY') {
                        preparedDocument['category'].push(row)
                    }
                    if (row.label === 'EDUCATION') {
                        preparedDocument['education'].push(row)
                    }
                    if (row.label === 'EXPERIENCE') {
                        preparedDocument['expirience'].push(row)
                    }
                    if (row.label === 'DOC') {
                        preparedDocument['doc'].push(row)
                    }
                    if (row.label === 'SUBORDINATION') {
                        preparedDocument['subordination'].push(row)
                    }
                    if (row.label === 'DUTIES') {
                        preparedDocument['duties'].push(row)
                    }
                    if (row.label === 'RESPONSIBILITY') {
                        preparedDocument['responsibility'].push(row)
                    }
                    if (row.label === 'GOAL') {
                        preparedDocument['goal'].push(row)
                    }
                    if (row.label === 'ORG') {
                        preparedDocument['organizations'].push(row)
                    }
                }
                this.document = preparedDocument;
            }
        },
        mounted() {
            EventBus.$on('loaded', data => this.prepareDocument(JSON.parse(data)));
        }
    }
</script>
