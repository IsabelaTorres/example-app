@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')
    <div class="container">
        <div id="event-create-container" class="container">
            <h1>Edite o seu evento</h1>
            <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <form-group>
                    <label for="image">Imagem do evento:</label>
                    <input type="file" class="form-control-file" id="image" name="image" placeholder="Imagem do evento">
                    <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
                </form-group><br>

                <form-group>
                    <label for="title">Evento:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{$event->title }}">
                </form-group>

                <form-group>
                    <label for="date">Data do Evento:</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">
                </form-group>

                <form-group>
                    <label for="city">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Nome da Cidade" value="{{$event->city}}">
                </form-group>

                <form-group>
                    <label for="private">O evento é privado?</label>
                    <select name="private" id="private" class="form-control">
                        <option value="0">Nao</option>
                        <option value="1" {{$event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
                    </select>
                </form-group>

                <form-group>
                    <label for="description">Descricao:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                        placeholder="O que vai acontecer no evento">{{$event->description}}</textarea>
                </form-group>

                <form-group>
                    <label for="check">Adicione itens de infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cerveja free"> Cerveja gratis
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Open food"> Open food
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Brindes"> Brindes
                    </div>
                </form-group>

                <input type="submit" class="btn btn-primary" value="Editar evento">

            </form>
        </div>
    </div>

@endsection
