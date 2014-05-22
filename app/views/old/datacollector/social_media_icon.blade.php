<a href="{{ str_replace('{username}', trim($account->username, '/'), $account->type->url) }}" target="_blank">
	<img src="{{ asset('assets/datacollector/img/socialmedia/'.$account->type->icon) }}" alt="{{ $account->type->name }}">
</a>
