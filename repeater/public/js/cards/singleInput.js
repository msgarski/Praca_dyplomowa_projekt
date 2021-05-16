import wstawka from '/js/cards/wstawka.js'

export default {
    name: 'app',
    components: {wstawka},
    data() {
        return {
            counter: 0,
            form: {
                'question': '',
                'answer': '',
                'pronounciation': '',
                'sentence': '',
                'image': null,
                'lesson_id': '1'
            },
            results: null,
        };
    },
    mounted() {
        setInterval(() => {
        this.counter++
        }, 1000)
    },
    methods:{
        createCard(){
           
            const url = "http://repeater.localhost/cards/createCard"
            console.log(this.form)
            axios.post(url, this.form)
                .then(response => {this.results = response})
                .then(() => {console.log(this.results)})
                .catch(function (error) {
                    console.log("post error: " + error);})
                //.then(response => {console.log(response.data)})
                this.counter = 1000
            }
            
        },
    template:
        `<wstawka></wstawka>
        <p>Uzupełnij pola:</p>
        <form>
            <div>
                <label for="question">Pytanie</label>
                <input type="text" v-model="form.question" name="question" id="question" >
            </div>
            <div>
                <label for="answer">Odpowiedź</label>
                <input type="text" v-model="form.answer" name="answer" id="answer" >
            </div>
            <div>
                <label for="pronounciation">Wymowa</label>
                <input type="text" v-model="form.pronounciation" name="pronounciation" id="pronounciation">
            </div>
            <div>
                <label for="sentence">Przykład użycia</label>
                <input type="text" v-model="form.sentence" name="sentence" id="sentence">
            </div>
            <div>
                <label for="image">Dodaj obrazek</label>
                <!-- <input type="button" id="loadFile" value="Wybierz obrazek z dysku" onclick="document.getElementById('image').click();" /> -->
                <input type="file" id="image" name="image"  size="300"/>
            </div>

            <button v-on:click.prevent="createCard()">Zapisz</button>
    
        </form>

        <div id="proba">
            <p>{{counter}}</p>
        </div>
        `,
  };