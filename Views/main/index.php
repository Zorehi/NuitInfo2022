<div class="quiz-list">
    <div class="quiz" data-status="active" data-index="0">
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
    <div class="quiz" data-status="after" data-index="1">
        <div class="quiz-question">
            <span>2eme question :  Selon l’OMS, combien de personnes vivent avec le VIH en fin 2021 ? </span>
        </div>
        <div class="quiz-container-reponse">
            <div class="quiz-answer">
                <span>20,6 Millions</span>
            </div>
            <div class="quiz-answer">
                <span>22,9 Millions</span>
            </div>
            <div class="quiz-answer">
                <span>30 Millions</span>
            </div>
            <div class="quiz-answer">
                <span>38,4 Millions</span>
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

    const quizList = document.getElementsByClassName('quiz-list')[0];
    function switchQuestion() {
        const active = quizList.querySelector('[data-status="active"]');
        const after = quizList.querySelector(`[data-index="${parseInt(active.dataset.index)+1}"]`);
        active.dataset.status = 'before';
        after.dataset.status = 'active';

    }

    document.addEventListener('keypress', function() {
        if (event.key == "Enter") {
            switchQuestion();
        }
    });

</script>