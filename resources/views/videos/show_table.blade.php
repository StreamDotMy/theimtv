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
                <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i> Edit</a>
            </th>
            </tr>
    </thead>   

</table>