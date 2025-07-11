<?php 
    # defining namespaces
    namespace MyProject{
        const CONNECT_OK = 2;
    }

    # defining sub-namespaces
    namespace MyProject\Sub\Level{
        const CONNECT_OK = 1;
        class Connection {}
        function connect(){}
    }

?>