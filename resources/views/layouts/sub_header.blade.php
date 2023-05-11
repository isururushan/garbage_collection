<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            @if(auth()->user()->type === 'Web Master')
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> Web Master</a></li>
                                @elseif(auth()->user()->type === 'Green Captain')
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> Green Captain</a></li>
                                @elseif(auth()->user()->type === 'GTF Members')
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> GTF Members</a></li>
                                @else
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> Collecting Staff</a></li>
                                @endif
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->