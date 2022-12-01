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

</script>