<form method="POST" action="{{ url('account') }}">
    @csrf
    <ul class="tr-list resume-info">
        <li class="career-objective">
            <div class="icon">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
            </div>  
            <div class="media-body">
                <span class="tr-title">{{ __('Title') }}</span>
                <input class="form-control" name="objective" placeholder="{{ __('Title of your resume') }}" value="{!! $user->crew->objective ? $user->crew->objective: '' !!}">
                <span class="tr-title">{{ __('Motivation') }}</span>
                <textarea class="form-control" rows="10" placeholder="{{ __('Fill in your marketing words') }}">{!! $user->crew->resume ? $user->crew->resume: '' !!}</textarea>
            </div>
        </li><!-- /.career-objective -->
        <li class="work-history">
            <div class="icon">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <div class="media-body additem-work">
                <span class="tr-title">Certificates</span>
                <div id="addhistory" class="additem">
                    <span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <div class="code-edit-small">
                        <label>{{ __('Title') }}</label>
                        <input class="form-control" name="title[]">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control" name="description[]"></textarea>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <label>From</label>
                                <select name="language_from[]" class="form-control">
                                    @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}">{!! $lang->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label>To</label>
                                <select name="language_to[]" class="form-control">
                                    @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}">{!! $lang->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label>{{ __('Year issued')}}</label>
                                <select name="issued[]" class="form-control">
                                    @for ($y=\Carbon\Carbon::now()->year; $y>=\Carbon\Carbon::now()->subYears(50)->year; $y--)
                                        <option value="{{ $y }}">{!! $y !!}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>						    	
            </div>
        </li><!-- /.work-history -->
        <li class="education-background">
            <div class="icon">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <div class="media-body additem-edu">
                <span class="tr-title">{{ __('Translation Proficiency') }}</span>
                <div id="add-edu" class="additem">
                    <span id="edu-clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Translation from:</label>
                            <select name="from[]" class="form-control">
                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->id }}">{!! $lang->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Translate in to:</label>
                            <select name="to[]" class="form-control">
                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->id }}">{!! $lang->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>{{ __('Level') }}</label>
                            <div class="rating-star">
                                <div class="rating">
                                    <input type="radio" id="star1" name="level[]"><label class="full" for="star1"></label>
                                    <input type="radio" id="star2" name="level[]"><label class="full" for="star2"></label>
                                    <input type="radio" id="star3" name="level[]"><label class="full" for="star3"></label>
                                    <input type="radio" id="star4" name="level[]"><label class="full" for="star4"></label>
                                    <input type="radio" id="star5" name="level[]"><label class="full" for="star5"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>{{ __('Description') }}</label>
                    <textarea class="form-control" name="description[]" placeholder="{{ __('Description') }}"></textarea>
                </div><!-- /.additem -->
            </div>
        </li><!-- /.personal-deatils -->
        <li class="personal-deatils">
            <div class="icon">
                <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Additional information') }}</span>
                <textarea class="form-control" rows="10" placeholder="{{ __('Additional information') }}"></textarea>
            </div>
        </li><!-- /.personal-deatils -->				
    </ul>
    <div class="buttons pull-right">
        <a href="#resume" class="btn button-cancle">{{ __('Cancel') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Update Your Resume') }}</button>
    </div>	
</form>