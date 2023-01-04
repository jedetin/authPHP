# authPHP
standalone PHP Object-Oriented Authentication codebase (framework independent)


## Requests
To be sent as `POST` parameters through an API or HTML form
`login: username, password`
`register: email, password_1, password_2`


### Database connection
Mention as private variables in Database Class:

    private  $host  =  'localhost';
    private  $username  =  'root';
    private  $password  =  'password#123';
    private  $database  =  'users';

#### Class Methods
`loginUser` : Login user and generate SESSION headers
`registerUser`: Create new user and login
`queryUser`: Find if a user exists in Database
`query`: Custom queries (For development only)

#### Error handling and response
Possible as either *JSON-objects* or *direct PHP output*

# Future updates:
To be worked on:
 - Seperate responses for HTML form requests and API requests
 - generation of tokens and timeouts

