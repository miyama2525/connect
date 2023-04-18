<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>connect</title>
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    </x-app-layout>
</head>
<body>
@canany(['teacher','admin'])
    <form method="POST" action="{{ route('up_content') }}">
        @csrf
        <div>
            @foreach($contents as $content)
            <input type = "hidden" value = "{{$content->id}}" name = "id">
            <!-- カテゴリー選択 -->
            <select 
                id="category_id"
                name="category_id"
                class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                value="{{ old('category_id') }}">
                    @foreach($categories as $id => $category_name)
                        @if ($id == 1)
                            <option value="{{ $id }}" selected="selected">{{ $category_name }}</option>
                        @else
                            <option value="{{ $id }}">{{ $category_name }}</option>
                        @endif
                    @endforeach
            </select>
            <!-- タイトル -->
            <div class="mt-4">
                <x-input-label for="title" value="タイトル" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{old('title',$content -> title)}}" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <!-- 内容 -->
            <div class="mt-4">
                <x-input-label for="content" value="内容" />
                <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" value="{{old('content',$content -> content)}}" />
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <!-- その他 -->
            <div class="mt-4">
                <x-input-label for="other" value="その他" />
                <x-text-input id="other" class="block mt-1 w-full" type="text" name="other" value="{{old('other',$content -> other)}}" />
                <x-input-error :messages="$errors->get('other')" class="mt-2" />
            </div>
            <input type="submit" value="変更する" onclick = "confirm('内容を変更します。よろしいですか？')">
            <a href ="{{route('post_content')}}">戻る</a>
            @endforeach
        </div>
    </form>
 @endcanany
</body>
</html>
