### 起因: 不小新把记录了公司服务器IP,账号,密码的文件提交到了git,要删除该提交记录，并且在log里看不到该记录

### 方法:
* git reset --hard <commit_id>
* git push origin HEAD --force


### 其他根据 –soft –mixed –hard，会对working tree和index和HEAD进行重置:
* git reset –mixed：此为默认方式，不带任何参数的git reset，即是这种方式，它回退到某个版本，只保留源码，回退commit和index信息
* git reset –soft：回退到某个版本，只回退了commit的信息，不会恢复到index file一级。如果还要提交，直接commit即可
* git reset –hard：彻底回退到某个版本，本地的源码也会变为上一个版本的内容

<pre>
    HEAD 最近一个提交
    HEAD^ 上一次
    <commit_id> 每次commit的SHA1值. 可以用git log 看到,也可以在页面上commit标签页里找到
    git reset –soft命令，只是撤销了commit的提交记录，commit改动的代码仍然存在，很受用。
    git reset --soft commit-id,其中的commit-id指的是撤销之前的那个commit id.
</pre>

### git代码库回滚: 指的是将代码库某分支退回到以前的某个commit id
###【本地代码库回滚】：
* git reset --hard commit-id :回滚到commit-id，讲commit-id之后提交的commit都去除
* git reset --hard HEAD~3：将最近3次的提交回滚


<pre>

问题：
(1)改完代码匆忙提交,上线发现有问题,怎么办? 赶紧回滚.
(2)改完代码测试也没有问题,但是上线发现你的修改影响了之前运行正常的代码报错,必须回滚.

取消提交,回退甚至返回上一版本都是特别重要的，大致分为下面2种情况:
1.本地已经commit，没有push到远端
这种情况发生在你的本地代码仓库,可能你add ,commit 以后发现代码有点问题,准备取消提交,用到下面命令。
git reset [--soft | --mixed | --hard

--mixed  会保留源码,只是将git commit和index 信息回退到了某个版本.
git reset 默认是 --mixed 模式 
git reset --mixed  等价于  git reset

--soft  保留源码,只回退到commit 信息到某个版本.不涉及index的回退,如果还需要提交,直接commit即可.

--hard  源码也会回退到某个版本,commit和index 都回回退到某个版本.(注意,这种方式是改变本地代码仓库源码)

当然有人在push代码以后,也使用 reset --hard <commit...> 回退代码到某个版本之前,但是这样会有一个问题,你线上的代码没有变,线上commit,index都没有变,当你把本地代码修改完提交的时候你会发现全是冲突.....

所以,这种情况你要使用下面的方式

2.代码已经push到远端
对于已经把代码push到线上仓库,你回退本地代码其实也想同时回退线上代码,回滚到某个指定的版本,线上,线下代码保持一致.你要用到下面的命令

git revert  用于反转提交,执行revert命令时要求工作树必须是干净的.
git revert  用一个新提交来消除一个历史提交所做的任何修改.

revert 之后你的本地代码会回滚到指定的历史版本,这时你再 git push 既可以把线上的代码更新.(这里不会像reset造成冲突的问题)

revert 使用,需要先找到你想回滚版本唯一的commit标识代码,可以用 git log 或者在adgit搭建的web环境历史提交记录里查看.

git revert c011eb3c20ba6fb38cc94fe5a8dda366a3990c61
通常,前几位即可
git revert c011eb3

git revert是用一次新的commit来回滚之前的commit，git reset是直接删除指定的commit看似达到的效果是一样的,其实完全不同.

git revert 和git reset的区别：
第一、上面我们说的如果你已经push到线上代码库, reset 删除指定commit以后,你git push可能导致一大堆冲突.但是revert 并不会.

第二、如果在日后现有分支和历史分支需要合并的时候,reset 恢复部分的代码依然会出现在历史分支里.但是revert 方式提交的commit 并不会出现在历史分支里.

第三、reset 是在正常的commit历史中,删除了指定的commit,这时 HEAD 是向后移动了,而 revert 是在正常的commit历史中再commit一次,只不过是反向提交,他的 HEAD 是一直向前的.


</pre>

aaaaaa

bbbbbb
