<div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li> 
                     <li class="nav-item mt-3">Expense Generator</li>
					</ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item"><a href="" class="btn btn-sm btn-danger">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                        <li> <a href="{{url('/')}}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>

                        <li class="has_sub"> 
                            <a href="#" class="waves-effect"> <span> <i class="fas fa-dollar-sign"></i> </span> <span>Expenses</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/todaynewexpenses')}}" ><span> <i class="fas fa-wallet"></i> </span><span class="hide-menu">Today's Expenses</span></a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/thismonthewexpenses')}}" ><span> <i class="fas fa-hand-holding-usd"></i> </span><span class="hide-menu">Current Month</span></a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/yearewexpenses')}}" ><span> <i class="fas fa-money-check-alt"></i> </span><span class="hide-menu">Year's Expenses</span></a></li>
                            </ul>
                        </li>

                    	
					</ul>
                </nav>
            </div>
        </aside>
<div class="page-wrapper">


