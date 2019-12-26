

@include('videos.player')

       

<table class="table table-borderless">


        <thead>
        <tr>
        <th style="width:10%" scope="col">Category</th>
        <th  class="h3" scope="col">
                @foreach ($categories as $category)
                <button type="button" class="btn btn-primary">
                        {{ $category->title }}
                </button>
                        
                @endforeach 
        </th>
        </tr>
        </thead>

        <thead>
        <tr>
        <th style="width:10%" scope="col">Genre</th>
        <th  class="h3" scope="col">
                @foreach ($genres as $genre)
                <button type="button" class="btn btn-primary">
                        {{ $genre->title }}
                </button>
                        
                @endforeach 
        </th>
        </tr>
        </thead>

        <thead>
        <tr>
        <th style="width:10%" scope="col">ID</th>
        <th  class="h3" scope="col"><button type="button" class="btn btn-primary">{{ $video->id }}</button></th>
        </tr>
        </thead>

        <thead>
                <tr>
                <th style="width:5%" scope="col">Title</th>
                <th  class="h3" scope="col">{{ $video->title }}</th>
                </tr>
        </thead>   

        <thead>
                <tr>
                <th style="width:5%" scope="col">Synopsis</th>
                <th class="h3" scope="col">{{ $video->synopsis }}</th>
                </tr>
        </thead>    

        <thead>
                <tr>
                <th style="width:5%" scope="col">Description</th>
                <th class="h3" scope="col">{{ $video->description }}</th>
                </tr>
        </thead>      


        <thead>
                <tr>
                <th style="width:5%" scope="col"></th>
                <th scope="row">
                <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i> Edit</a>
                </th>
                </tr>
        </thead>   

</table>