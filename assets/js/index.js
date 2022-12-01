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

const quizList = document.getElementsByClassName('quiz-list')[0];
function switchQuestion() {
    const active = quizList.querySelector('[data-current="active"]');
    const after = quizList.querySelector(`[data-index="${parseInt(active.dataset.index)+1}"]`);
    active.dataset.current = 'before';
    after.dataset.current = 'active';

}

document.addEventListener('keypress', function() {
    if (event.key == "Enter") {
        switchQuestion();
    }
});