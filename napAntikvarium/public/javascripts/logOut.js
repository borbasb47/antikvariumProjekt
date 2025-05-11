const sessionClear={shouldSessionClear:"Yes"}
const sessionClearJson=JSON.stringify(sessionClear)

fetch('/napAntikvarium/api/logOut.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: sessionClearJson
})