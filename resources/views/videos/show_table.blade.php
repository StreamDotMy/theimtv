<table class="table table-borderless">
    <thead>
        <tr>
        <th style="width:10%" scope="col">ID</th>
        <th  class="h3" scope="col">{{ $video->id }}</th>
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
                <a href="{{ route('videos.edit',['id' => $video->id]) }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </th>
            </tr>
    </thead>   

</table>