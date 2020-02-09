<ul class="tr-list resume-info">
    <li class="career-objective">
        <div class="icon">
            <i class="fa fa-black-tie" aria-hidden="true"></i>
        </div>  
        <div class="media-body">
            <span class="tr-title">Company Info</span>
            {!! $user->client && $user->client->info ? nl2br($user->client->info): __('No company information') !!}
        </div>
    </li>					
</ul>
<div class="buttons pull-right">
    <a href="#edit-company" aria-controls="edit-company" role="tab" data-toggle="tab" class="btn btn-primary">Update Profile</a>
</div>