const sessionClear={shouldSessionClear:"Yes"}
const sessionClearJson=JSON.stringify(sessionClear)

fetch('/1017projekt/api/logOut.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: sessionClearJson
})