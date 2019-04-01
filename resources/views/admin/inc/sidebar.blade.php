<ul class="list-group">
    <li class="list-group-item"><a href="{{route('admin')}}"><i class="fa fa-shield-alt"></i> Dashboard</a></li>
    <li class="list-group-item"><a href="{{route('post.index')}}"><i class="fa fa-file"></i> Posts</a></li>
    @if(Auth::user()->admin)
        <li class="list-group-item"><a href="{{route('category.index')}}"><i class="fa fa-list"></i> Categories</a></li>
        <li class="list-group-item"><a href="{{route('tag.index')}}"><i class="fa fa-tag"></i> Tags</a></li>
        <li class="list-group-item"><a href="{{route('user.index')}}"><i class="fa fa-users-cog"></i> Users</a></li>
        <li class="list-group-item"><a href="{{route('admin.message.all')}}"><i class="fa fa-mail-bulk"></i> User Messages</a></li>
        <li class="list-group-item"><a href="{{route('product.index')}}"><i class="fa fa-shopping-bag"></i> Products</a></li>
    @endif
    <li class="list-group-item"><a href="{{route('user.profile')}}"><i class="fa fa-book"></i> My Profile</a></li>
    @if(Auth::user()->owner)
        <li class="list-group-item"><a href="{{route('settings')}}"><i class="fa fa-cog"></i> Site Settings</a></li>
    @endif
</ul>