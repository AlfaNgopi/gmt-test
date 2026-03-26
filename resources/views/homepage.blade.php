<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="">
    <div class="w-100">


        <form class="mt-5 mb-3" action="{{route('addBook')}}" method="post">
            <div class="row">
                <div class="col-4">
                    title
                    <input name="title" id="title" type="text">
                </div>

                <div class="col-4">
                    author
                    <input name="author" id="author" type="text">
                </div>

                <div class="col-4">
                    kategori
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>\
                        @endforeach
                    </select>
                </div>

                <div class="col-4">
                    stock
                    <input name="stock" id="stock" type="text">
                </div>

                

                <button type="submit" class="btn btn-success"> tambah buku </button>
            </div>

        </form>

        <div class="container">
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <td>title</td>
                        <td>author</td>
                        <td>kategori</td>
                        <td>stock</td>
                        <td>action</td>
                    </tr>

                </thead>
                <tbody id="table-body">
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>bentar</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>