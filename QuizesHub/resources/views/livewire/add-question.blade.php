<div>
    <?php 
        // $questions = [
        //     [
        //         'text'=>'asdf',
        //         'answers'=> [
        //             1,
        //             2,
        //             3,
        //         ]
        //     ]
        // ];
    ?>
    <!-- Display success message -->
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="saveQuestions">
        @foreach($questions as $index => $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Question #{{ $index + 1 }}</h5>
                    <textarea wire:model="questions.{{ $index }}.content" placeholder="Enter question" class="form-control"></textarea>

                    <h6>Answers</h6>
                    @foreach($question['answers'] as $aIndex => $answer)
                        <div class="input-group mb-2">
                            <input wire:model="questions.{{ $index }}.answers.{{ $aIndex }}.content" class="form-control" placeholder="Enter answer" />
                            <button type="button" wire:click="removeAnswer({{ $index }}, {{ $aIndex }})" class="btn btn-danger">Remove Answer</button>
                        </div>
                    @endforeach

                    <button type="button" wire:click="addAnswer({{ $index }})" class="btn btn-primary">Add Answer</button>

                    <hr />
                    <button type="button" wire:click="removeQuestion({{ $index }})" class="btn btn-danger">Remove Question</button>
                </div>
            </div>
        @endforeach
        <button type="button" wire:click="addQuestion" class="btn btn-primary mb-3">Add New Question</button>
        <button type="submit" class="btn btn-success">Save Questions</button>
    </form>
</div>