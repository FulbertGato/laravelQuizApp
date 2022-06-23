@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Créer une nouvelle question</h4>
                <form class="outer-repeater" method="POST" action="/question/store">
                    @csrf
                    <div data-repeater-list="outer" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="mb-3">
                                <label class="form-label" for="formmessage">Question :</label>
                                <textarea id="formmessage" class="form-control" rows="3" name="question"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Type question</label>
                                <div class="col-md-12">
                                    <select class="form-select" name="type">
                                        <option>Selectionner le type de la question</option>
                                        @foreach ($types as $type)
                                        <option value="{{$type->id}}" >{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="inner-repeater mb-4">
                                <div data-repeater-list="reponses" class="inner form-group">
                                    <label class="form-label">Ajouter des réponses (NB: Veuillez mettre la bonne réponse en premier) :</label>
                                    <div data-repeater-item class="inner mb-3 row">
                                        <div class="col-md-10 col-8">

                                            <textarea class=" inner form-control" placeholder="Entrer une réponse" rows="3" name="reponse"></textarea>
                                        </div>
                                        <div class="col-md-2 col-4">
                                            <div class="d-grid">
                                                <input data-repeater-delete type="button" class="btn btn-primary inner" value="Delete"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success inner" value="Ajouter"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formmessage">Points:</label>
                                <input class="form-control" type="number" value="5"  name="points">
                            </div>




                            <button type="submit" class="btn btn-primary">Ajouter la question</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
