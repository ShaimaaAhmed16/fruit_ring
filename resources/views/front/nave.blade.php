<nav class="navbar fixed-bottom text-center row bg-gray">
    @if(auth('client-web')->user())
        <div class="nav-item nav-link col">
            <div>
                <i class="far fa-user-circle text-silver"></i>
            </div>
            <a href="{{route('myacount')}}" class="text-silver">
                <small>
                    حسابى
                </small>
            </a>
        </div>

    @else
        <div class="nav-item nav-link col">
            <div>
                <i class="far fa-user-circle text-silver"></i>
            </div>
            <a href="#" class="text-silver myBtn2">
                <small>
                    حسابى
                </small>
            </a>
        </div>
    @endif

    <div class="nav-item nav-link col">
        <div>
            <i class="fas fa-shopping-basket text-silver"></i> @if(Cart::count() > 0)
            <span class="badge ml-1">{{Cart::count()}} @endif</span>
        </div>
        <a href="{{route('cart')}}" class="text-silver">
            <small>
                سلة الشراء
            </small>
        </a>
    </div>
    <div class="nav-item nav-link col">
        <div>
            <i class="fas fa-apple-alt text-silver"></i>
        </div>
        <a href="{{route('product.pransh')}}" class="text-silver">
            <small>
                منتجاتنا
            </small>
        </a>
    </div>
    <div class="nav-item nav-link col">
        <div>
            <i class="fas fa-store-alt text-silver"></i>
        </div>
        <a href="{{route('index')}}" class="text-silver">
            <small>
                الرئيسية
            </small>
        </a>
    </div>

</nav>