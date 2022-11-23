@if (isset($articles) && !empty($articles))
    @foreach ($articles as $article)
        <span>{{ $article->description }}</span>
        <hr>
    @endforeach
@else
    <span>Brak aktualnych wpisów</span>
@endif
