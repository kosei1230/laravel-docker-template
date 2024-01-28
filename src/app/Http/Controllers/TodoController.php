<?php


namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{

    private $todo;
    // Todoモデルのインスタンス化
    // コンストラクタとはオブジェクトが生成される際に、このメソッドが自動的に呼び出される。
    public function __construct(Todo $todo)
    {
        // $thisはクラス自身
        // $this->todoにTodoインスタンスが格納される
        $this->todo = $todo;

    }

    public function create()
    {
        // action="{{ route('todo.store') }}"の値が引数として入る
        return view('todo.create');
    }
    // 新規作成
    // TodoRequestクラスをインスタンス化したものが$requestに代入される（ほか同様）
    public function store(TodoRequest $request)
    {
        // $inputsにはフォームの内容がname属性 => value属性の形で連装配列で取得できる
        $inputs = $request->all();
        // fillメソッドは連装配列の内容をTodoオブジェクトにセットしている
        // この時fillableで許可したkeyのみセットする
        $this->todo->fill($inputs);
        // セットされた値をDBに保存（INSERT文が実行される）
        $this->todo->save();
        // 一覧画面（index.php.bladeを短縮した記述）にリダイレクト
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    public function index()
    {
        $todos = $this->todo->all();
        // view()の第一引数は対象のBladeファイルを指定。
        // そのBlade内で利用できる変数を宣言しています。[Blade内での変数名 => 代入したい値]['渡す先での変数名' => 今回渡す変数]"
        return view('todo.index', ['todos' => $todos]);
        
    }

    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}

    