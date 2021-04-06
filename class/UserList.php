<?php
final class UserList
{
    /**
     * @var User[] The users
     */
    private $list;

    /**
     * The constructor.
     * 
     * @param User ...$user The users
     */
    public function __construct(User ...$user) 
    {
        $this->list = $user;
    }
    
    /**
     * Add user to list.
     *
     * @param User $user The user
     *
     * @return void
     */
    public function add(User $user): void
    {
        $this->list[] = $user;
    }

    /**
     * Get all users.
     *
     * @return User[] The users
     */
    public function all(): array
    {
        return $this->list;
    }
}

?>