<div class="quiz-list">
    <div class="quiz">
        <div class="quiz-question">
            <span>Première question : Quand à été fondé l’association Sida Info Service ??</span>
        </div>
        <div class="quiz-container-reponse">
            <div class="quiz-answer">
                <span>1980</span>
            </div>
            <div class="quiz-answer">
                <span>1990</span>
            </div>
            <div class="quiz-answer">
                <span>2000</span>
            </div>
            <div class="quiz-answer">
                <span>2010</span>
            </div>
        </div>
    </div>
</div>

<script text="text/javascript">
    const quiz_list = document.getElementsByClassName('quiz');

    for (const quiz of quiz_list) {
        const quiz_answer_list = quiz.getElementsByClassName('quiz-answer');

        for (const quiz_answer of quiz_answer_list) {
            quiz_answer.addEventListener('click', function() {
                const current = quiz.querySelector('[data-current="answer"]');
                if (current) {
                    current.removeAttribute('data-current');
                }
                quiz_answer.dataset.current = "answer";
            })
        }

    }

    // Add event listener on keypress
    document.addEventListener('keydown', (event) => {
        var name = event.key;
        var code = event.code;
        index = -1;
        currentIndex = -1;
        // Cherche quelle est la case sélectionnée pour l'instant
        const quiz_answer_list = document.getElementsByClassName('quiz-answer');

        for (i = 0; i < quiz_answer_list.length; i++) {
            if(quiz_answer_list[i].dataset.current == "answer"){
                currentIndex = i;
            }
        }


        // Si la touche appuyée est une lettre de l'alphabet on peut en déduire l'index de la réponse que l'on veut sélectionner
        if(name.length == 1){
            if(name.charCodeAt(0) >= "a".charCodeAt(0) && name.charCodeAt(0) <= "z".charCodeAt(0)){
                index = 25 - "z".charCodeAt(0) + name.charCodeAt(0); 
            }
            if(name.charCodeAt(0) >= "A".charCodeAt(0) && name.charCodeAt(0) <= "Z".charCodeAt(0)){
                index = 25 - "Z".charCodeAt(0) + name.charCodeAt(0); 
            }
        }

        // Si la touche est fleche gauche, il faut selectionner la réponse précédente
        if(name == "ArrowLeft"){
            if(currentIndex == -1){
                index = 0
            }
            else{
                index = currentIndex - 1
            }
        }
        // Si la touche est fleche droite, il faut selectionner la prochaine réponse
        else if(name == "ArrowRight"){
            if(currentIndex == -1){
                index = 0
            }
            else{
                index = currentIndex + 1
            }
        }
        else if(name == "ArrowUp"){
            if(currentIndex == -1){
                index = 0
            }
            else{
                index = currentIndex - 2
            }
        }
        else if(name == "ArrowDown"){
            if(currentIndex == -1){
                index = 0
            }
            else{
                index = currentIndex + 2
            }
        }

        if(index >= 0 && index <= quiz_answer_list.length-1){
            for (i = 0; i < quiz_answer_list.length; i++) {
                quiz_answer_list[i].removeAttribute('data-current');
                if(i == index){
                    quiz_answer_list[i].dataset.current = "answer";
                }
            }
        }

    }, false);


</script>