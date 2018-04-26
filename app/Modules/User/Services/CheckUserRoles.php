<?phpnamespace App\Modules\User\Services;use App\Modules\User\Models\User;use App\Modules\User\Repositories\UserInterface;use Illuminate\Support\Facades\Auth;class CheckUserRoles{    protected $user;    public function __construct(UserInterface $user)    {        $this->user = $user;    }    public function assignedRoles($currentRoute = 'branch.index')    {        $user = Auth::user();        if ($user->user_type == 'super_admin') {            return true;        }        $userRoutes = [];        foreach ($user->role as $roles) {            foreach ($roles->permission as $permission) {                $userRoutes[] = $permission->route_name;            }        }        $defaultRoutes = ['login', 'logout', 'dashboard'];        $userAllowRoutes = array_merge($userRoutes, $defaultRoutes);        if (in_array($currentRoute, $userAllowRoutes)) {            return true;        }        return false;    }}