<div>
    <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['edit-personal-information'] ? 'active' : ''}}" id="account-tab" wire:click="changeTab('edit-personal-information')">
                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Personal</span>
            </a>
        </li>

        @can('edit-users')
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['edit-official-information'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('edit-official-information')">
                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Official</span>
            </a>
        </li>
        @endcan
        
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['user-education-add'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('user-education-add')">
                <i class="feather icon-book mr-25"></i><span class="d-none d-sm-block">Education</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['experiencelist'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('experiencelist')">
                <i class="feather icon-pie-chart mr-25"></i><span class="d-none d-sm-block">Experience</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['skill-list'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('skill-list')">
                <i class="feather icon-pie-chart mr-25"></i><span class="d-none d-sm-block">Skills</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['user-attendance-list'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('user-attendance-list')">
                <i class="feather icon-calendar mr-25"></i><span class="d-none d-sm-block">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['leave-history-list'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('leave-history-list')">
                <i class="feather icon-calendar mr-25"></i><span class="d-none d-sm-block">Leaves</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['under-development'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('under-development')">
                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Salaries</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['under-development'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('under-development')">
                <i class="feather icon-pie-chart mr-25"></i><span class="d-none d-sm-block">Monthly Evaluation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['admin-change-password'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('admin-change-password')">
                <i class="feather icon-pie-chart mr-25"></i><span class="d-none d-sm-block">Security</span>
            </a>
        </li>

        @can('edit-users')
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['roles-and-permissions-list'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('roles-and-permissions-list')">
                <i class="feather icon-pie-chart mr-25"></i><span class="d-none d-sm-block">Permissions</span>
            </a>
        </li>
        @endcan

    </ul>

    @if($view['edit-personal-information'])
    @livewire('user.edit-personal-information', [ 'userId' => $userId])
    @endif

    @if($view['roles-and-permissions-list'])
    @can('edit-users')
    @livewire('roles-and-permissions.roles-and-permissions-list', [ 'userId' => $userId])
    @endcan
    @endif

    @if($view['admin-change-password'])
    @livewire('user.security.admin-change-password', [ 'userId' => $userId])
    @livewire('user.security.user-sessions',['userId' => $userId])
    @livewire('user.security.delete-my-account',['userId' => $userId])
    @endif

    @if($view['edit-official-information'])
    @can('edit-users')
    @livewire('user.edit-official-information', [ 'userId' => $userId])
    @endcan
    @endif

    @if($view['user-attendance-list'])
    @livewire('user.user-attendance-list', [ 'userId' => $userId])
    @endif

    @if($view['leave-history-list'])
    @livewire('leave.leave-history-list', [ 'userId' => $userId])
    @endif

    @if($view['user-education-add'])
    @livewire('user.user-education.user-education-add', [ 'userId' => $userId])
    @endif

    @if($view['experiencelist'])
    @livewire('experience.experiencelist', [ 'userId' => $userId])
    @endif

    @if($view['skill-list'])
    @livewire('skill.skill-list', [ 'userId' => $userId])
    @endif

    @if($view['under-development'])
    @livewire('extras.under-development')
    @endif
</div>