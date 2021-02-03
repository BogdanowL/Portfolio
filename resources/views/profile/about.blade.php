<table class="table">
    <tbody>
    <tr>
        <td>Страна</td>
        <td>{{$user->country}}</td>
    </tr>
    <tr>
        <td>Возраст</td>
        <td>{{$user->age}}</td>
    </tr>
    <tr>
        <td>Город</td>
        <td>{{$user->city}}</td>
    </tr>
    <tr>
        <td>Пол</td>
        <td>{{$user->getGender()}}</td>
    </tr>
    </tbody>
</table>
<h5 class="ml-2">Обо мне:</h5>
<h5 class="text-left ml-2">{{$user->about_me}}</h5>
