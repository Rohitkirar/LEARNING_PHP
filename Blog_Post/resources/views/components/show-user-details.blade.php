<div class="container text-center bg-white w-50 p-5 " style="font-size: 20px ; text-align:left">
    <h4 class="">User Profile</h4>

    <hr>
    <div class="text-center mb-3 mt-3">
        <img class="rounded-circle" height=100px width=100px src="{{asset($user->avatar)}}" alt="">
    </div>
    <P>Name : {{ $user->name }} </P>

    <P>Email : {{ $user->email }} </P>

    <P>Phone : {{ $user->phone_number }} </P>

    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary float-right">Edit</a>

</div>
