<div>
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if($addCategory)
            @include('livewire.category.create')
        @endif
        @if($updateCategory)
            @include('livewire.category.update')
        @endif 
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              @if(!$addCategory)
                <button wire:click="addCategory()" class="btn btn-primary btn-sm float-right">Add New Post</button>
                @endif 
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) > 0)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                       
                                        <td>
                                            <button wire:click="editCategory({{$category->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteCategory({{$category->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No categories Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
</div>
