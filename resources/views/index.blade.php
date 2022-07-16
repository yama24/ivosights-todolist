<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app.f812159a.css') }}">
    <title>Document</title>
    <script src="{{ asset('build/assets/app.f812159a.css') }}"></script>
</head>

<body id="app">
    <div class="paper container margin-bottom-large border border-primary">
        <h1>To Do List</h1>
        <p>Yayan Maulana (maulana24@live.com)</p>
        <div class="row flex-spaces child-borders margin-bottom-none">
            <label class="paper-btn" for="modal-1">Add Todolist</label>
        </div>
    </div>
    <div class="paper container margin-bottom-large border border-2 border-primary">
        <div style="border-color: #41403e;" class="card border border-6 border-primary margin-bottom">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 align-middle">
                        <fieldset class="form-group margin-bottom-none">
                            <label for="paperChecks1" class="paper-check" style="margin-bottom: 0;">
                                <input type="checkbox" name="paperChecks" id="paperChecks1" value="option 1">
                                <span>
                                    <h4 style="display: inline;">Lorem, ipsum.</h4>
                                    <p style="margin-bottom: 0;">Lorem ipsum dolor sit amet.</p>
                                </span>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div style="border-color: #41403e;" class="card border border-4 border-primary margin-bottom">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 align-middle">
                        <fieldset class="form-group margin-bottom-none">
                            <label for="paperChecks2" class="paper-check" style="margin-bottom: 0;">
                                <input type="checkbox" name="paperChecks" id="paperChecks2" value="option 1">
                                <span>
                                    <h4 style="display: inline;">Lorem, ipsum dolor.</h4>
                                    <p style="margin-bottom: 0;">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                </span>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input class="modal-state" id="modal-1" type="checkbox">
    <div class="modal">
        <label class="modal-bg" for="modal-1"></label>
        <div class="modal-body">
            <label class="btn-close" for="modal-1">X</label>
            <h4 class="modal-title">Modal Title</h4>
            <h5 class="modal-subtitle">Modal Subtitle</h5>
            <p class="modal-text">This is an example of modal which is implemented with pure CSS! :D</p>
            <label for="modal-1">Nice!</label>
        </div>
    </div>

    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    message: 'Hello Vue!'
                }
            }
        }).mount('#app')
    </script>
</body>

</html>
