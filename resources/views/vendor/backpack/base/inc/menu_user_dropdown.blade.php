@php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown pr-4">
    @php
        $array = config('laravellocalization.supportedLocales');
        $currentLanguageName = $array[$locale]['native'];
    @endphp
    <a href="#" hreflang="{{ $locale }}" id="navbarDropdown" class="nav-link dropdown-toggle" @if(Auth::check() === true)style="padding: 15px" @endif role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <img width="25" height="25" src="{{asset('assets/img/flags/1x1/' . $locale . '.svg')}}" class="border border-1 rounded-circle"> {{ $currentLanguageName }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a class="dropdown-item" hreflang="{{ $localeCode }}" href="/{{ $localeCode }}/lang"><img width="25" height="25" src="{{asset('assets/img/flags/1x1/' . $localeCode . '.svg')}}" class="border border-1 rounded-circle"> {{ $properties['native'] }}</a>
        @endforeach
    </div>
</li>
<li class="nav-item dropdown pr-4">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative;width: 35px;height: 35px;margin: 0 10px;">
        <img class="img-avatar" src="{{ backpack_avatar_url(backpack_auth()->user()) }}" alt="{{ backpack_auth()->user()->name }}" onerror="this.style.display='none'" style="margin: 0;position: absolute;left: 0;z-index: 1;">
        <span class="backpack-avatar-menu-container" style="position: absolute;left: 0;width: 100%;background-color: #00a65a;border-radius: 50%;color: #FFF;line-height: 35px;font-size: 85%;font-weight: 300;">
      {{backpack_user()->getAttribute('name') ? mb_substr(backpack_user()->name, 0, 1, 'UTF-8') : 'A'}}
    </span>
    </a>
    <div class="dropdown-menu {{ config('backpack.base.html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1">
        <a class="dropdown-item" href="{{ route('backpack.account.info') }}"><i class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="la la-lock"></i> {{ trans('backpack::base.logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
