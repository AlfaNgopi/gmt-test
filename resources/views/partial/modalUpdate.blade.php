<div class="modal fade res-modal" id="modalUpdate{{$id}}" tabndex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
    <form class="" action="{{ route('update') }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <input hidden=true name="id" id="id" type="text" value="{{$id}}">
                            title
                            <input name="title" id="title" type="text" value="{{$title}}">
                        </div>

                        <div class="col-4">
                            author
                            <input name="author" id="author" type="text" value="{{$author}}">
                        </div>

                        <div class="col-4">
                            kategori
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                               

                                @if($book->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            stock
                            <input name="stock" id="stock" type="number" value="{{$stock}}">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> update buku </button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>