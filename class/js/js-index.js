const app = new Vue({
    el: '#app',
    data: {
        errors: [],
        pessoa: null,
        name: null,
        age: null
    },
    methods: {
        checkForm: function (e) {
            if (this.name && this.age) {
                return true;
            }

            this.errors = [];

            if (!this.name) {
                this.errors.push('O nome é obrigatório.');
            }
            if (!this.age) {
                this.errors.push('A idade é obrigatória.');
            }

            e.preventDefault();
        }
    },

    mounted: function () {
        var url = window.location.search.replace("?", "");
        var items = url.split("&");

        var array = {
            'a_pessoa': items[0],
            'a_nome': items[1],
            'a_idade': items[2]
        }

        this.pessoa = array.a_pessoa.split("=").splice(1);
        this.name = array.a_nome.split("=").splice(1);
        this.age = array.a_idade.split("=").splice(1);

    }
})