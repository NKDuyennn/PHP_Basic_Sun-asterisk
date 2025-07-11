<?php
    namespace Foo\Bar;
    include 'file1.php';

    const FOO=2;
    function foo(){}
    class foo{
        static function staticmethod(){}
    }

    // Unqualified name
    foo();
    foo::staticmethod();
    echo FOO;

    // Qualified name
    subnamespace\foo();
    subnamespace\foo::staticmethod();
    echo subnamespace\FOO;

    // Fully qualified name
    \Foo\Bar\foo();
    \Foo\Bar\foo::staticmethod();
    echo \Foo\Bar\FOO;
?>

