<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>connect</title>
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    </x-app-layout>
    <link rel="stylesheet" href="/style.css" >
</head>
<body>
@canany(['teacher','admin'])
    <p class="title">記事の投稿</p>
    <form method="POST" action="{{ route('store_content') }}">
        @csrf
        <div>
            <!-- カテゴリー選択 -->
            <select 
            id="category_id"
            name="category_id"
            class="select_box"
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
            <p>タイトル</p>
                <x-text-input id="title" class="text_title" type="text" name="title" :value="old('title')" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <!-- 内容 -->
            <div class="mt-4">
            <p>内容</p>
                <input id="content" class="text_box" type="textarea" name="content" :value="old('content')" />
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <!-- その他 -->
            <div class="mt-4">
            <p>その他</p>
                <input id="other" class="text_box" type="textarea" name="other" :value="old('other')" />
                <x-input-error :messages="$errors->get('other')" class="mt-2" />
            </div>
            <div class ="send_div">
                <button class="send_button">投稿する</button>
            </div>
        </div>
    </form>
    <div>
        <!--プルダウンカテゴリ選択-->
        <form method="GET" action="{{ route('search_content')}}">
            <div class="form-group row">
                <p class="title">投稿一覧</p>
                <div class="col-sm-3">
                    <select 
                        id="categoryId"
                        name="categoryId"
                        class="form-control {{ $errors->has('categoryId') ? 'is-invalid' : '' }} select_box"
                        value="{{ old('categoryId') }}">
                        @foreach($categories as $id => $category_name)
                            <option value="{{ $id }}">{{ $category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="send_button" name="search_content">検索</button>
            </div>
        </form>
    </div>
    @if (!empty($contents))
        <div>
        <p>全{{ $contents->count() }}件</p>
            <table>
                <tr>
                    <th>タイトル</th>
                    <th>内容</th>
                    <th>その他</th>
                    <th></th>
                </tr>
                @foreach($contents as $content)
                <tr>
                <td>{{ $content->title }}</td>
                <td>{{ $content->content }}</td>
                <td>{{ $content->other }}</td>
                <td><a href="{{route('edit_content',$content->id)}}" class="table_button">編集</a>
                <a href="{{route('delete_content',$content->id)}}" class="table_button" onclick='return Checkdelete()'>削除</a>
                </td>
                </tr>
                @endforeach   
            </table>
        </div>
        <!--ページネーション-->
        <div class="d-flex justify-content-center">
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $contents->appends(request()->input())->links() }}
        </div>

    @endif
@endcanany

@can('guardian')
    <div>
        <!--プルダウンカテゴリ選択-->
        <form method="GET" action="{{ route('search_content')}}">
            <div class="form-group row">
                <p class="title">投稿一覧</p>
                <div class="col-sm-3">
                    <select 
                        id="categoryId"
                        name="categoryId"
                        class="form-control {{ $errors->has('categoryId') ? 'is-invalid' : '' }} select_box"
                        value="{{ old('categoryId') }}">
                        @foreach($categories as $id => $category_name)
                            <option value="{{ $id }}">{{ $category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="send_button" name="search_content">検索</button>
            </div>
        </form>
    </div>
    @if (!empty($contents))
        <div>
        <p>全{{ $contents->count() }}件</p>
            <table>
                @foreach($contents as $content)
                <tr><th colspan="3">内容</th></tr>
                <tr>
                    <td>{{ $content->title }}</td>
                    <td><a href = "{{ route('detail_create',$content->id) }}" class="table_button">詳細</a></td>
                    <td><a href = "{{ route('pdf',$content->id) }}" class="table_button">PDFダウンロード</a></td>
                </tr>
                @endforeach   
            </table>
        </div>
        <!--ページネーション-->
        <div class="d-flex justify-content-center">
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $contents->appends(request()->input())->links() }}
        </div>
    @endif
    @endcan

    <script type="text/javascript">

    function Checkdelete(){
      if(confirm('変更します。よろしいですか？')){
      /*削除OKの時の処理 */
        return true;
      }else{
        /*キャンセルの時の処理*/
        return false;
      }
    }
    </script>
</body>
</html>
