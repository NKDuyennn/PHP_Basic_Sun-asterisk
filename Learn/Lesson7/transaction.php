<?php
    // Transaction trong MySQL
    class Bank {
        public function transfer($from, $to, $amount){
            try{
                $this->pdo->beginTransaction();

                // check nguoi gui co du tien khong
                $sql = 'SELECT amount FROM accounts WHERE id=:from';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(array(":from" => $from));
                $availableAmount = (int)$stmt->fetchColumn();
                $stmt->closeCursor();

                if($availableAmount < $amount){
                    echo "Insufficient amount to transfer";
                    $this->pdo->rollBack();
                    return false;
                }

                $sql_update_from = 'UPDATE accounts 
                                    SET amount = amount - :amount
                                    WHERE id = :from';
                $stmt = $this->pdo->prepare($sql_update_from);
                $stmt->execute(array(":from" => $from, ":amount" => $amount));
                $stmt->closeCursor();

                $sql_update_to =   'UPDATE accounts
                                    SET amount = amount + :amount
                                    WHERE id = :to';
                $stmt = $this->pdo->prepare($sql_update_to);
                $stmt->execute(array(":to" => $to, ":amount" => $amount));
                $stmt->closeCursor();

                // commit transaction

                $this->pdo->commit();

                echo "The amount has been transferred successfully!";

                return true;
            } catch (PDOException $e){
                $this->pdo->rollBack();
                die($e->getMessage());
            }
        }
    }

    $bank = new Bank();
    $bank->transfer('1','2', 100000);
?>