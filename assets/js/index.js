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

document.addEventListener('click', function(event) {
    console.log(event.pageX);
    console.log(event.pageY);
});

const quizList = document.getElementsByClassName('quiz-list')[0];
function switchQuestion() {
    const active = quizList.querySelector('[data-current="active"]');
    const after = quizList.querySelector(`[data-index="${parseInt(active.dataset.index)+1}"]`);
    active.dataset.current = 'before';
    after.dataset.current = 'active';
    if (after.dataset.index == 10) {
        const list = document.querySelectorAll('[dir="ltr"]');
        for (const elem of list) {
            elem.setAttribute('dir', 'rtl');
        }
    } else {
        const list = document.querySelectorAll('[dir="rtl"]');
        for (const elem of list) {
            elem.setAttribute('dir', 'ltr');
        }
    }

}

function goFirstQuestion(){
    listAllQuiz = quizList.getElementsByClassName("quiz");
    for(i = 0; i < listAllQuiz.length; i++){
        quiz = listAllQuiz[i];
        quiz.dataset.current = 'after';

        quizResponseList = quiz.getElementsByClassName('quiz-answer');
        for(j = 0; j < quizResponseList.length; j++){
            quizResponseList[j].removeAttribute('data-current');
        }

    }
    listAllQuiz[0].dataset.current = 'active';

}

// Add event listener on keypress

document.addEventListener('keydown', (event) => {
    var name = event.key;
    var code = event.code;
    index = -1;
    indexCurrentResponse = -1;
    // quizList = document.getElementsByClassName("quiz");
    activeQuiz = quizList.querySelector('[data-current="active"]');
    indexCurrentQuiz = activeQuiz.dataset.index;

    // Recupere les réponses de la question active
    quiz_answer_list = activeQuiz.getElementsByClassName('quiz-answer');
    for (i = 0; i < quiz_answer_list.length; i++) {
        if(quiz_answer_list[i].dataset.current == "answer"){
            indexCurrentResponse = i;
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
        if(indexCurrentResponse == -1){
            index = 0
        }
        else{
            index = indexCurrentResponse - 1
        }
    }
    // Si la touche est fleche droite, il faut selectionner la prochaine réponse
    else if(name == "ArrowRight"){
        if(indexCurrentResponse == -1){
            index = 0
        }
        else{
            index = indexCurrentResponse + 1
        }
    }
    else if(name == "ArrowUp"){
        if(indexCurrentResponse == -1){
            index = 0
        }
        else{
            index = indexCurrentResponse - 2
        }
    }
    else if(name == "ArrowDown"){
        if(indexCurrentResponse == -1){
            index = 0
        }
        else{
            index = indexCurrentResponse + 2
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

    if(name == "Enter"){
        if((indexCurrentResponse+1) == parseInt(activeQuiz.dataset.response) - indexCurrentQuiz - 2){
            switchQuestion();
        }
        else{
            goFirstQuestion();
        }
    }

}, false);